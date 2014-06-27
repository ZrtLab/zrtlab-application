class sqlite {
    package { 
            "sqlite":
                ensure => installed,
                require => Exec["manager update"]
    }
}
