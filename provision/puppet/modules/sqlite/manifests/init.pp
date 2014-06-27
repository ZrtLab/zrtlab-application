class sqlite {
    package { 
            "sqlite":
                ensure => installed,
                required => Exec["manager update"]
    }
}
