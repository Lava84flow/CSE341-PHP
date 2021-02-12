CREATE SCHEMA anniesattic;


ALTER SCHEMA anniesattic OWNER TO osmlfjpdadfgto;

CREATE TYPE anniesattic.address_type AS ENUM (
    'shipping',
    'billing'
);


ALTER TYPE anniesattic.address_type OWNER TO osmlfjpdadfgto;

SET default_tablespace = '';

SET default_table_access_method = heap;

CREATE TABLE anniesattic.addresses (
    idaddresses integer NOT NULL,
    customers_idcustomers integer NOT NULL,
    address_type anniesattic.address_type NOT NULL,
    address_line1 character varying(100) NOT NULL,
    address_line2 character varying(100),
    city character varying(45) NOT NULL,
    state character(2) NOT NULL,
    zipcode character varying(9) NOT NULL
);


ALTER TABLE anniesattic.addresses OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.addresses_idaddresses_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.addresses_idaddresses_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.addresses_idaddresses_seq OWNED BY anniesattic.addresses.idaddresses;


CREATE TABLE anniesattic.customers (
    idcustomers integer NOT NULL,
    first_name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    username character varying(50) NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(100) NOT NULL
);


ALTER TABLE anniesattic.customers OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.customers_idcustomers_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.customers_idcustomers_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.customers_idcustomers_seq OWNED BY anniesattic.customers.idcustomers;


CREATE TABLE anniesattic.line_items (
    idline_items integer NOT NULL,
    orders_idorders integer NOT NULL,
    products_idproducts integer NOT NULL,
    line_item_amount integer
);


ALTER TABLE anniesattic.line_items OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.line_items_idline_items_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.line_items_idline_items_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.line_items_idline_items_seq OWNED BY anniesattic.line_items.idline_items;



CREATE TABLE anniesattic.media_type (
    idmedia_type integer NOT NULL,
    media_name character varying(50) NOT NULL
);


ALTER TABLE anniesattic.media_type OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.media_type_idmedia_type_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.media_type_idmedia_type_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.media_type_idmedia_type_seq OWNED BY anniesattic.media_type.idmedia_type;


CREATE TABLE anniesattic.orders (
    idorders integer NOT NULL,
    customers_idcustomers integer NOT NULL,
    subtotal money NOT NULL,
    taxes money NOT NULL,
    shipping money NOT NULL,
    status character varying(50) NOT NULL,
    shipping_address character varying(150) NOT NULL,
    billing_address character varying(150)
);


ALTER TABLE anniesattic.orders OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.orders_idorders_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.orders_idorders_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.orders_idorders_seq OWNED BY anniesattic.orders.idorders;


CREATE TABLE anniesattic.payment_details (
    idpayment_details integer NOT NULL,
    customers_idcustomers integer NOT NULL,
    card_number character varying(16) NOT NULL,
    exp_date character varying(8) NOT NULL,
    ccv character varying(4) NOT NULL
);


ALTER TABLE anniesattic.payment_details OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.payment_details_idpayment_details_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.payment_details_idpayment_details_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.payment_details_idpayment_details_seq OWNED BY anniesattic.payment_details.idpayment_details;


CREATE TABLE anniesattic.products (
    idproducts integer NOT NULL,
    media_type_idmedia_type integer NOT NULL,
    dimensions character varying(50),
    quantity integer NOT NULL,
    price money NOT NULL,
    description character varying(300)
);


ALTER TABLE anniesattic.products OWNER TO osmlfjpdadfgto;


CREATE SEQUENCE anniesattic.products_idproducts_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.products_idproducts_seq OWNER TO osmlfjpdadfgto;


ALTER SEQUENCE anniesattic.products_idproducts_seq OWNED BY anniesattic.products.idproducts;


ALTER TABLE ONLY anniesattic.addresses ALTER COLUMN idaddresses SET DEFAULT nextval('anniesattic.addresses_idaddresses_seq'::regclass);


ALTER TABLE ONLY anniesattic.customers ALTER COLUMN idcustomers SET DEFAULT nextval('anniesattic.customers_idcustomers_seq'::regclass);


ALTER TABLE ONLY anniesattic.line_items ALTER COLUMN idline_items SET DEFAULT nextval('anniesattic.line_items_idline_items_seq'::regclass);


ALTER TABLE ONLY anniesattic.media_type ALTER COLUMN idmedia_type SET DEFAULT nextval('anniesattic.media_type_idmedia_type_seq'::regclass);


ALTER TABLE ONLY anniesattic.orders ALTER COLUMN idorders SET DEFAULT nextval('anniesattic.orders_idorders_seq'::regclass);


ALTER TABLE ONLY anniesattic.payment_details ALTER COLUMN idpayment_details SET DEFAULT nextval('anniesattic.payment_details_idpayment_details_seq'::regclass);


ALTER TABLE ONLY anniesattic.products ALTER COLUMN idproducts SET DEFAULT nextval('anniesattic.products_idproducts_seq'::regclass);


COPY anniesattic.addresses (idaddresses, customers_idcustomers, address_type, address_line1, address_line2, city, state, zipcode) FROM stdin;
\.


COPY anniesattic.customers (idcustomers, first_name, last_name, username, email, password) FROM stdin;
\.


COPY anniesattic.line_items (idline_items, orders_idorders, products_idproducts, line_item_amount) FROM stdin;
\.


COPY anniesattic.media_type (idmedia_type, media_name) FROM stdin;
\.


COPY anniesattic.orders (idorders, customers_idcustomers, subtotal, taxes, shipping, status, shipping_address, billing_address) FROM stdin;
\.


COPY anniesattic.payment_details (idpayment_details, customers_idcustomers, card_number, exp_date, ccv) FROM stdin;
\.


COPY anniesattic.products (idproducts, media_type_idmedia_type, dimensions, quantity, price, description) FROM stdin;
\.


SELECT pg_catalog.setval('anniesattic.addresses_idaddresses_seq', 1, false);


SELECT pg_catalog.setval('anniesattic.customers_idcustomers_seq', 1, false);


SELECT pg_catalog.setval('anniesattic.line_items_idline_items_seq', 1, false);


SELECT pg_catalog.setval('anniesattic.media_type_idmedia_type_seq', 1, false);


SELECT pg_catalog.setval('anniesattic.orders_idorders_seq', 1, false);


SELECT pg_catalog.setval('anniesattic.payment_details_idpayment_details_seq', 1, false);


SELECT pg_catalog.setval('anniesattic.products_idproducts_seq', 1, false);


ALTER TABLE ONLY anniesattic.addresses
    ADD CONSTRAINT addresses_pkey PRIMARY KEY (idaddresses);


ALTER TABLE ONLY anniesattic.line_items
    ADD CONSTRAINT line_items_pkey PRIMARY KEY (idline_items);


ALTER TABLE ONLY anniesattic.media_type
    ADD CONSTRAINT media_type_pkey PRIMARY KEY (idmedia_type);
    

ALTER TABLE ONLY anniesattic.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (idorders);


ALTER TABLE ONLY anniesattic.customers
    ADD CONSTRAINT pk_idcustomers PRIMARY KEY (idcustomers);


ALTER TABLE ONLY anniesattic.payment_details
    ADD CONSTRAINT pk_idpayment_details PRIMARY KEY (idpayment_details);

ALTER TABLE ONLY anniesattic.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (idproducts);


ALTER TABLE ONLY anniesattic.customers
    ADD CONSTRAINT uc_email UNIQUE (email);


ALTER TABLE ONLY anniesattic.customers
    ADD CONSTRAINT uc_username UNIQUE (username);


ALTER TABLE ONLY anniesattic.addresses
    ADD CONSTRAINT addresses_customers_idcustomers_fkey FOREIGN KEY (customers_idcustomers) REFERENCES anniesattic.customers(idcustomers) NOT VALID;


ALTER TABLE ONLY anniesattic.payment_details
    ADD CONSTRAINT fk_customers_idcustomers FOREIGN KEY (customers_idcustomers) REFERENCES anniesattic.customers(idcustomers);


ALTER TABLE ONLY anniesattic.line_items
    ADD CONSTRAINT line_items_orders_idorders_fkey FOREIGN KEY (orders_idorders) REFERENCES anniesattic.orders(idorders);


ALTER TABLE ONLY anniesattic.line_items
    ADD CONSTRAINT line_items_products_idproducts_fkey FOREIGN KEY (products_idproducts) REFERENCES anniesattic.products(idproducts);


ALTER TABLE ONLY anniesattic.orders
    ADD CONSTRAINT orders_customers_idcustomers_fkey FOREIGN KEY (customers_idcustomers) REFERENCES anniesattic.customers(idcustomers);


ALTER TABLE ONLY anniesattic.products
    ADD CONSTRAINT products_media_type_idmedia_type_fkey FOREIGN KEY (media_type_idmedia_type) REFERENCES anniesattic.media_type(idmedia_type) NOT VALID;


GRANT ALL ON LANGUAGE plpgsql TO osmlfjpdadfgto;