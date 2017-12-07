    function truDB() 
    {
        var number_of_students = 0;
        var db = [];  // empty arrary
                       // db[i] is an object, {id: ..., name: ..., email: ...}.
        
        return {
            exist: function(id) {
                for (var i = 0; i < number_of_students; i++)
                    if (db[i].id == id) {  // if ids are the same
                        return true;
                    }
                
                return false;
            },
            
            add: function(id, name, email) {
                if(this.exist(id))
                    return;
                db.push({id: id, name: name, email: email});  // push a new value into the array
                                           // the new value is an object that have three properties, id, name, and email.
                number_of_students++;
            },
            
            remove: function(id) {  // You cannot use delete because delete is a ...
                if (!this.exist(id))  // if the record of id does not exist
                    return;
                for (var i = 0; i < number_of_students; i++)
                    if (db[i].id == id) {  // if the record of id is found
                        db.splice(i, 1);  // delete will just remove the value, not the space.
                                            // remove 1 element from i.
                        number_of_students--;
                        return;
                    }
            },
            
            get: function(id) {
                if (!this.exist(id))  // if the record of id does not exist, then return the empty object.
                    return [];
                for (var i = 0; i < number_of_students; i++)
                    if (db[i].id == id) {  // if the record of id is found
                        return db[i];  // return the student object of id
                    }
            },
            
            display: function(){
                var str = "<table class='table table-striped'>";
                str += '<thead>';
                str += '<tr><th>Id</th><th>Name</th><th>Email</th></tr>';
                str += '</thead>';
                str += '<tbody>';
                for (var i = 0; i < number_of_students; i++) {
                    str += '<tr>';
                    str += '<td>' + db[i].id + '</td>';   // id
                    str += '<td>' + db[i].name + '</td>';  // name
                    str += '<td>' + db[i].email + '</td>';        // email
                    str += '</tr>';
                }
                str += '</tbody>';
                str += '</table>';
                return str;
            }
        };
    }
