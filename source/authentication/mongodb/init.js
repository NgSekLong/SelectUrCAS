
let res = [
    db.users.insertMany([
        {
            username: "casuser",
            password: "Mellon",
        },
        {
            username: "mongodb",
            password: "Mellon",
        },
    ]),
]

printjson(res);