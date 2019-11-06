## Freeradius Authentication

Work in process...


/etc/raddb/
- clients.conf
client dockernet {
    ipaddr = 0.0.0.0/0
    secret = testing123
}

- mods-config
- mods-config/files/
- mods-config/files/authorize
bob    Cleartext-Password := "hello"

