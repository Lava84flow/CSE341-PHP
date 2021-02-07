TRUNCATE TABLE anniesattic.customers RESTART IDENTITY CASCADE;


INSERT INTO anniesattic.customers 
VALUES (
      DEFAULT
    , 'John'
    , 'Smith'
    , 'username'
    , 'johnsmith@gmail.com'
    , 'password'
);

INSERT INTO anniesattic.customers
VALUES (
      DEFAULT
    , 'Mary'
    , 'Nickelson'
    , 'LivebSonata'
    , 'lyda1971@gmail.com'
    , 'Ain1leiNigh'
);


TRUNCATE TABLE anniesattic.orders RESTART IDENTITY CASCADE;

INSERT INTO anniesattic.orders 
VALUES (
      DEFAULT
    , 1
    , 200.00
    , 40.00
    , 5.00
    , 'Completed'
    , '4583 Broad Street, Birmingham, AL, 35215'
    , '4583 Broad Street, Birmingham, AL, 35215'
);

INSERT INTO anniesattic.orders 
VALUES (
      DEFAULT
    , 2
    , 24.99
    , 2.15
    , 2.00
    , 'Completed'
    , '3375 School Street, New Haven, CT, 06511'
    , '2478 Tenmile, Escondido, CA, 92025'
);

INSERT INTO anniesattic.orders 
VALUES (
      DEFAULT
    , 1
    , 149.99
    , 15.00
    , 15.00
    , 'Completed'
    , '4583 Broad Street, Birmingham, AL, 35215'
    , '4583 Broad Street, Birmingham, AL, 35215'
);

INSERT INTO anniesattic.orders 
VALUES (
      DEFAULT
    , 2
    , 50.00
    , 4.00
    , 2.50
    , 'In Progress'
    , '3375 School Street, New Haven, CT, 06511'
    , '2478 Tenmile, Escondido, CA, 92025'
);