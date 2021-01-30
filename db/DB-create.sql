--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5 (Ubuntu 12.5-1.pgdg20.04+1)
-- Dumped by pg_dump version 13.1

-- Started on 2021-01-29 16:43:57

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 7 (class 2615 OID 6395613)
-- Name: anniesattic; Type: SCHEMA; Schema: -; Owner: osmlfjpdadfgto
--

CREATE SCHEMA anniesattic;


ALTER SCHEMA anniesattic OWNER TO osmlfjpdadfgto;

--
-- TOC entry 643 (class 1247 OID 6395959)
-- Name: address_type; Type: TYPE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE TYPE anniesattic.address_type AS ENUM (
    'shipping',
    'billing'
);


ALTER TYPE anniesattic.address_type OWNER TO osmlfjpdadfgto;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 208 (class 1259 OID 6395968)
-- Name: addresses; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

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

--
-- TOC entry 207 (class 1259 OID 6395966)
-- Name: addresses_idaddresses_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.addresses_idaddresses_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.addresses_idaddresses_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4028 (class 0 OID 0)
-- Dependencies: 207
-- Name: addresses_idaddresses_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.addresses_idaddresses_seq OWNED BY anniesattic.addresses.idaddresses;


--
-- TOC entry 204 (class 1259 OID 6395713)
-- Name: customers; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE TABLE anniesattic.customers (
    idcustomers integer NOT NULL,
    first_name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    username character varying(50) NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(50) NOT NULL
);


ALTER TABLE anniesattic.customers OWNER TO osmlfjpdadfgto;

--
-- TOC entry 203 (class 1259 OID 6395711)
-- Name: customers_idcustomers_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.customers_idcustomers_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.customers_idcustomers_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4029 (class 0 OID 0)
-- Dependencies: 203
-- Name: customers_idcustomers_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.customers_idcustomers_seq OWNED BY anniesattic.customers.idcustomers;


--
-- TOC entry 216 (class 1259 OID 6396146)
-- Name: line_items; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE TABLE anniesattic.line_items (
    idline_items integer NOT NULL,
    orders_idorders integer NOT NULL,
    products_idproducts integer NOT NULL,
    line_item_amount integer
);


ALTER TABLE anniesattic.line_items OWNER TO osmlfjpdadfgto;

--
-- TOC entry 215 (class 1259 OID 6396144)
-- Name: line_items_idline_items_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.line_items_idline_items_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.line_items_idline_items_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4030 (class 0 OID 0)
-- Dependencies: 215
-- Name: line_items_idline_items_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.line_items_idline_items_seq OWNED BY anniesattic.line_items.idline_items;


--
-- TOC entry 214 (class 1259 OID 6396096)
-- Name: media_type; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE TABLE anniesattic.media_type (
    idmedia_type integer NOT NULL,
    media_name character varying(50) NOT NULL
);


ALTER TABLE anniesattic.media_type OWNER TO osmlfjpdadfgto;

--
-- TOC entry 213 (class 1259 OID 6396094)
-- Name: media_type_idmedia_type_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.media_type_idmedia_type_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.media_type_idmedia_type_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4031 (class 0 OID 0)
-- Dependencies: 213
-- Name: media_type_idmedia_type_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.media_type_idmedia_type_seq OWNED BY anniesattic.media_type.idmedia_type;


--
-- TOC entry 210 (class 1259 OID 6396026)
-- Name: orders; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

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

--
-- TOC entry 209 (class 1259 OID 6396024)
-- Name: orders_idorders_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.orders_idorders_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.orders_idorders_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4032 (class 0 OID 0)
-- Dependencies: 209
-- Name: orders_idorders_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.orders_idorders_seq OWNED BY anniesattic.orders.idorders;


--
-- TOC entry 206 (class 1259 OID 6395843)
-- Name: payment_details; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE TABLE anniesattic.payment_details (
    idpayment_details integer NOT NULL,
    customers_idcustomers integer NOT NULL,
    card_number character varying(16) NOT NULL,
    exp_date character varying(8) NOT NULL,
    ccv character varying(4) NOT NULL
);


ALTER TABLE anniesattic.payment_details OWNER TO osmlfjpdadfgto;

--
-- TOC entry 205 (class 1259 OID 6395841)
-- Name: payment_details_idpayment_details_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.payment_details_idpayment_details_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.payment_details_idpayment_details_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4033 (class 0 OID 0)
-- Dependencies: 205
-- Name: payment_details_idpayment_details_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.payment_details_idpayment_details_seq OWNED BY anniesattic.payment_details.idpayment_details;


--
-- TOC entry 212 (class 1259 OID 6396085)
-- Name: products; Type: TABLE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE TABLE anniesattic.products (
    idproducts integer NOT NULL,
    media_type_idmedia_type integer NOT NULL,
    dimensions character varying(50),
    quantity integer NOT NULL,
    price money NOT NULL,
    description character varying(300)
);


ALTER TABLE anniesattic.products OWNER TO osmlfjpdadfgto;

--
-- TOC entry 211 (class 1259 OID 6396083)
-- Name: products_idproducts_seq; Type: SEQUENCE; Schema: anniesattic; Owner: osmlfjpdadfgto
--

CREATE SEQUENCE anniesattic.products_idproducts_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anniesattic.products_idproducts_seq OWNER TO osmlfjpdadfgto;

--
-- TOC entry 4034 (class 0 OID 0)
-- Dependencies: 211
-- Name: products_idproducts_seq; Type: SEQUENCE OWNED BY; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER SEQUENCE anniesattic.products_idproducts_seq OWNED BY anniesattic.products.idproducts;


--
-- TOC entry 3853 (class 2604 OID 6395971)
-- Name: addresses idaddresses; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.addresses ALTER COLUMN idaddresses SET DEFAULT nextval('anniesattic.addresses_idaddresses_seq'::regclass);


--
-- TOC entry 3851 (class 2604 OID 6395716)
-- Name: customers idcustomers; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.customers ALTER COLUMN idcustomers SET DEFAULT nextval('anniesattic.customers_idcustomers_seq'::regclass);


--
-- TOC entry 3857 (class 2604 OID 6396149)
-- Name: line_items idline_items; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.line_items ALTER COLUMN idline_items SET DEFAULT nextval('anniesattic.line_items_idline_items_seq'::regclass);


--
-- TOC entry 3856 (class 2604 OID 6396099)
-- Name: media_type idmedia_type; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.media_type ALTER COLUMN idmedia_type SET DEFAULT nextval('anniesattic.media_type_idmedia_type_seq'::regclass);


--
-- TOC entry 3854 (class 2604 OID 6396029)
-- Name: orders idorders; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.orders ALTER COLUMN idorders SET DEFAULT nextval('anniesattic.orders_idorders_seq'::regclass);


--
-- TOC entry 3852 (class 2604 OID 6395846)
-- Name: payment_details idpayment_details; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.payment_details ALTER COLUMN idpayment_details SET DEFAULT nextval('anniesattic.payment_details_idpayment_details_seq'::regclass);


--
-- TOC entry 3855 (class 2604 OID 6396088)
-- Name: products idproducts; Type: DEFAULT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.products ALTER COLUMN idproducts SET DEFAULT nextval('anniesattic.products_idproducts_seq'::regclass);


--
-- TOC entry 4013 (class 0 OID 6395968)
-- Dependencies: 208
-- Data for Name: addresses; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.addresses (idaddresses, customers_idcustomers, address_type, address_line1, address_line2, city, state, zipcode) FROM stdin;
\.


--
-- TOC entry 4009 (class 0 OID 6395713)
-- Dependencies: 204
-- Data for Name: customers; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.customers (idcustomers, first_name, last_name, username, email, password) FROM stdin;
\.


--
-- TOC entry 4021 (class 0 OID 6396146)
-- Dependencies: 216
-- Data for Name: line_items; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.line_items (idline_items, orders_idorders, products_idproducts, line_item_amount) FROM stdin;
\.


--
-- TOC entry 4019 (class 0 OID 6396096)
-- Dependencies: 214
-- Data for Name: media_type; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.media_type (idmedia_type, media_name) FROM stdin;
\.


--
-- TOC entry 4015 (class 0 OID 6396026)
-- Dependencies: 210
-- Data for Name: orders; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.orders (idorders, customers_idcustomers, subtotal, taxes, shipping, status, shipping_address, billing_address) FROM stdin;
\.


--
-- TOC entry 4011 (class 0 OID 6395843)
-- Dependencies: 206
-- Data for Name: payment_details; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.payment_details (idpayment_details, customers_idcustomers, card_number, exp_date, ccv) FROM stdin;
\.


--
-- TOC entry 4017 (class 0 OID 6396085)
-- Dependencies: 212
-- Data for Name: products; Type: TABLE DATA; Schema: anniesattic; Owner: osmlfjpdadfgto
--

COPY anniesattic.products (idproducts, media_type_idmedia_type, dimensions, quantity, price, description) FROM stdin;
\.


--
-- TOC entry 4035 (class 0 OID 0)
-- Dependencies: 207
-- Name: addresses_idaddresses_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.addresses_idaddresses_seq', 1, false);


--
-- TOC entry 4036 (class 0 OID 0)
-- Dependencies: 203
-- Name: customers_idcustomers_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.customers_idcustomers_seq', 1, false);


--
-- TOC entry 4037 (class 0 OID 0)
-- Dependencies: 215
-- Name: line_items_idline_items_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.line_items_idline_items_seq', 1, false);


--
-- TOC entry 4038 (class 0 OID 0)
-- Dependencies: 213
-- Name: media_type_idmedia_type_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.media_type_idmedia_type_seq', 1, false);


--
-- TOC entry 4039 (class 0 OID 0)
-- Dependencies: 209
-- Name: orders_idorders_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.orders_idorders_seq', 1, false);


--
-- TOC entry 4040 (class 0 OID 0)
-- Dependencies: 205
-- Name: payment_details_idpayment_details_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.payment_details_idpayment_details_seq', 1, false);


--
-- TOC entry 4041 (class 0 OID 0)
-- Dependencies: 211
-- Name: products_idproducts_seq; Type: SEQUENCE SET; Schema: anniesattic; Owner: osmlfjpdadfgto
--

SELECT pg_catalog.setval('anniesattic.products_idproducts_seq', 1, false);


--
-- TOC entry 3867 (class 2606 OID 6395973)
-- Name: addresses addresses_pkey; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.addresses
    ADD CONSTRAINT addresses_pkey PRIMARY KEY (idaddresses);


--
-- TOC entry 3875 (class 2606 OID 6396151)
-- Name: line_items line_items_pkey; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.line_items
    ADD CONSTRAINT line_items_pkey PRIMARY KEY (idline_items);


--
-- TOC entry 3873 (class 2606 OID 6396101)
-- Name: media_type media_type_pkey; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.media_type
    ADD CONSTRAINT media_type_pkey PRIMARY KEY (idmedia_type);


--
-- TOC entry 3869 (class 2606 OID 6396031)
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (idorders);


--
-- TOC entry 3859 (class 2606 OID 6395718)
-- Name: customers pk_idcustomers; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.customers
    ADD CONSTRAINT pk_idcustomers PRIMARY KEY (idcustomers);


--
-- TOC entry 3865 (class 2606 OID 6395848)
-- Name: payment_details pk_idpayment_details; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.payment_details
    ADD CONSTRAINT pk_idpayment_details PRIMARY KEY (idpayment_details);


--
-- TOC entry 3871 (class 2606 OID 6396090)
-- Name: products products_pkey; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (idproducts);


--
-- TOC entry 3861 (class 2606 OID 6395722)
-- Name: customers uc_email; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.customers
    ADD CONSTRAINT uc_email UNIQUE (email);


--
-- TOC entry 3863 (class 2606 OID 6395720)
-- Name: customers uc_username; Type: CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.customers
    ADD CONSTRAINT uc_username UNIQUE (username);


--
-- TOC entry 3877 (class 2606 OID 6395989)
-- Name: addresses addresses_customers_idcustomers_fkey; Type: FK CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.addresses
    ADD CONSTRAINT addresses_customers_idcustomers_fkey FOREIGN KEY (customers_idcustomers) REFERENCES anniesattic.customers(idcustomers) NOT VALID;


--
-- TOC entry 3876 (class 2606 OID 6395849)
-- Name: payment_details fk_customers_idcustomers; Type: FK CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.payment_details
    ADD CONSTRAINT fk_customers_idcustomers FOREIGN KEY (customers_idcustomers) REFERENCES anniesattic.customers(idcustomers);


--
-- TOC entry 3880 (class 2606 OID 6396152)
-- Name: line_items line_items_orders_idorders_fkey; Type: FK CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.line_items
    ADD CONSTRAINT line_items_orders_idorders_fkey FOREIGN KEY (orders_idorders) REFERENCES anniesattic.orders(idorders);


--
-- TOC entry 3881 (class 2606 OID 6396157)
-- Name: line_items line_items_products_idproducts_fkey; Type: FK CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.line_items
    ADD CONSTRAINT line_items_products_idproducts_fkey FOREIGN KEY (products_idproducts) REFERENCES anniesattic.products(idproducts);


--
-- TOC entry 3878 (class 2606 OID 6396032)
-- Name: orders orders_customers_idcustomers_fkey; Type: FK CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.orders
    ADD CONSTRAINT orders_customers_idcustomers_fkey FOREIGN KEY (customers_idcustomers) REFERENCES anniesattic.customers(idcustomers);


--
-- TOC entry 3879 (class 2606 OID 6396109)
-- Name: products products_media_type_idmedia_type_fkey; Type: FK CONSTRAINT; Schema: anniesattic; Owner: osmlfjpdadfgto
--

ALTER TABLE ONLY anniesattic.products
    ADD CONSTRAINT products_media_type_idmedia_type_fkey FOREIGN KEY (media_type_idmedia_type) REFERENCES anniesattic.media_type(idmedia_type) NOT VALID;


--
-- TOC entry 4027 (class 0 OID 0)
-- Dependencies: 666
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO osmlfjpdadfgto;


-- Completed on 2021-01-29 16:44:12

--
-- PostgreSQL database dump complete
--

