class redis {
    package { 
        "redis-server":
            ensure => installed,
            required => Exec["manager update"]
    }
}
