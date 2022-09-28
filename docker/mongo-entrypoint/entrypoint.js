var db = connect("mongodb://admin:pass@localhost:27017/admin");

db = db.getSiblingDB('klyp_dev_test'); // we can not use "use" statement here to switch db

db.createUser(
    {
        user: "root",
        pwd: "root",
        roles: [ { role: "readWrite", db: "klyp_dev_test"} ],
        passwordDigestor: "server",
    }
)