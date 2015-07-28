--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.6
-- Dumped by pg_dump version 9.3.6
-- Started on 2015-07-28 11:13:29

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2100 (class 1262 OID 24576)
-- Name: repo; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE repo WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';


ALTER DATABASE repo OWNER TO postgres;

\connect repo

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 206 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2103 (class 0 OID 0)
-- Dependencies: 206
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 183 (class 1259 OID 65639)
-- Name: secuencia; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE secuencia
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.secuencia OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 181 (class 1259 OID 65631)
-- Name: address; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE address (
    id integer DEFAULT nextval('secuencia'::regclass) NOT NULL,
    street character(50)
);


ALTER TABLE public.address OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 65634)
-- Name: address_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE address_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.address_id_seq OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 65665)
-- Name: cart_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cart_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cart_id_seq OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 65655)
-- Name: cart; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cart (
    id integer DEFAULT nextval('cart_id_seq'::regclass) NOT NULL,
    name character(50),
    customer_id integer
);


ALTER TABLE public.cart OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 65696)
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 65698)
-- Name: category; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE category (
    id integer DEFAULT nextval('category_id_seq'::regclass) NOT NULL,
    name character(50),
    parent_id integer
);


ALTER TABLE public.category OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 65609)
-- Name: comment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE comment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comment_id_seq OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 65620)
-- Name: comment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE comment (
    id integer DEFAULT nextval('comment_id_seq'::regclass) NOT NULL,
    content character(100),
    user_id integer
);


ALTER TABLE public.comment OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 65743)
-- Name: course_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_id_seq OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 65745)
-- Name: course; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE course (
    id integer DEFAULT nextval('course_id_seq'::regclass) NOT NULL,
    name character(70)
);


ALTER TABLE public.course OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 65647)
-- Name: customer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customer_id_seq OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 65649)
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE customer (
    id integer DEFAULT nextval('customer_id_seq'::regclass) NOT NULL,
    name character(50)
);


ALTER TABLE public.customer OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 65769)
-- Name: employee_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE employee_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.employee_id_seq OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 65771)
-- Name: employee; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE employee (
    id integer DEFAULT nextval('employee_id_seq'::regclass) NOT NULL,
    name character(60)
);


ALTER TABLE public.employee OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 65668)
-- Name: event_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.event_id_seq OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 65670)
-- Name: event; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE event (
    id integer DEFAULT nextval('event_id_seq'::regclass) NOT NULL,
    timezone character(60),
    created timestamp without time zone
);


ALTER TABLE public.event OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 65777)
-- Name: friends; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE friends (
    employee_id integer NOT NULL,
    friend_employee_id integer NOT NULL
);


ALTER TABLE public.friends OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 65709)
-- Name: group_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.group_id_seq OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 65730)
-- Name: groupapp_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE groupapp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.groupapp_id_seq OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 65711)
-- Name: groupapp; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE groupapp (
    id integer DEFAULT nextval('groupapp_id_seq'::regclass) NOT NULL,
    name character(60)
);


ALTER TABLE public.groupapp OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 65544)
-- Name: person_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE person_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.person_id_seq OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 65546)
-- Name: person; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE person (
    id integer DEFAULT nextval('person_id_seq'::regclass) NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE public.person OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 65717)
-- Name: persons_groups; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE persons_groups (
    person_id integer NOT NULL,
    group_id integer NOT NULL
);


ALTER TABLE public.persons_groups OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 65552)
-- Name: product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_id_seq OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 65583)
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 65573)
-- Name: products; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE products (
    id integer DEFAULT nextval('products_id_seq'::regclass) NOT NULL,
    name character(100)
);


ALTER TABLE public.products OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 65680)
-- Name: student_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_id_seq OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 65683)
-- Name: student; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE student (
    id integer DEFAULT nextval('student_id_seq'::regclass) NOT NULL,
    name character(60),
    mentor_id integer
);


ALTER TABLE public.student OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 65735)
-- Name: teacher_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE teacher_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.teacher_id_seq OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 65737)
-- Name: teacher; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE teacher (
    id integer DEFAULT nextval('teacher_id_seq'::regclass) NOT NULL,
    name character(60)
);


ALTER TABLE public.teacher OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 65754)
-- Name: teachers_courses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE teachers_courses (
    teacher_id integer NOT NULL,
    course_id integer NOT NULL
);


ALTER TABLE public.teachers_courses OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 65598)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 65614)
-- Name: userapp; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE userapp (
    id integer DEFAULT nextval('user_id_seq'::regclass) NOT NULL,
    login character(50)
);


ALTER TABLE public.userapp OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 65592)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 65560)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    username character(50),
    password character(50),
    email character(50),
    id integer DEFAULT nextval('usuario_id_seq'::regclass) NOT NULL,
    address_id integer
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 2104 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN usuario.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN usuario.email IS '
';


--
-- TOC entry 1945 (class 2606 OID 65582)
-- Name: AD; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY products
    ADD CONSTRAINT "AD" PRIMARY KEY (id);


--
-- TOC entry 1951 (class 2606 OID 65638)
-- Name: PK_address; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY address
    ADD CONSTRAINT "PK_address" PRIMARY KEY (id);


--
-- TOC entry 1949 (class 2606 OID 65625)
-- Name: PK_comment; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT "PK_comment" PRIMARY KEY (id);


--
-- TOC entry 1971 (class 2606 OID 65750)
-- Name: PK_course; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY course
    ADD CONSTRAINT "PK_course" PRIMARY KEY (id);


--
-- TOC entry 1953 (class 2606 OID 65653)
-- Name: PK_customer; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY customer
    ADD CONSTRAINT "PK_customer" PRIMARY KEY (id);


--
-- TOC entry 1975 (class 2606 OID 65775)
-- Name: PK_employee; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY employee
    ADD CONSTRAINT "PK_employee" PRIMARY KEY (id);


--
-- TOC entry 1957 (class 2606 OID 65674)
-- Name: PK_event; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY event
    ADD CONSTRAINT "PK_event" PRIMARY KEY (id);


--
-- TOC entry 1967 (class 2606 OID 65734)
-- Name: PK_relacion; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY persons_groups
    ADD CONSTRAINT "PK_relacion" PRIMARY KEY (person_id, group_id);


--
-- TOC entry 1973 (class 2606 OID 65758)
-- Name: PK_relacion_course; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY teachers_courses
    ADD CONSTRAINT "PK_relacion_course" PRIMARY KEY (teacher_id, course_id);


--
-- TOC entry 1959 (class 2606 OID 65688)
-- Name: PK_student; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT "PK_student" PRIMARY KEY (id);


--
-- TOC entry 1969 (class 2606 OID 65742)
-- Name: PK_teacher; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY teacher
    ADD CONSTRAINT "PK_teacher" PRIMARY KEY (id);


--
-- TOC entry 1943 (class 2606 OID 65590)
-- Name: PK_usuario; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT "PK_usuario" PRIMARY KEY (id);


--
-- TOC entry 1955 (class 2606 OID 65659)
-- Name: Pk_cart; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cart
    ADD CONSTRAINT "Pk_cart" PRIMARY KEY (id);


--
-- TOC entry 1963 (class 2606 OID 65703)
-- Name: Pk_category; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY category
    ADD CONSTRAINT "Pk_category" PRIMARY KEY (id);


--
-- TOC entry 1977 (class 2606 OID 65783)
-- Name: Pk_employee; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT "Pk_employee" PRIMARY KEY (employee_id, friend_employee_id);


--
-- TOC entry 1965 (class 2606 OID 65716)
-- Name: Pk_group; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groupapp
    ADD CONSTRAINT "Pk_group" PRIMARY KEY (id);


--
-- TOC entry 1961 (class 2606 OID 65695)
-- Name: Uni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT "Uni" UNIQUE (mentor_id);


--
-- TOC entry 1941 (class 2606 OID 65551)
-- Name: person_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_pkey PRIMARY KEY (id);


--
-- TOC entry 1947 (class 2606 OID 65619)
-- Name: user_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY userapp
    ADD CONSTRAINT user_pk PRIMARY KEY (id);


--
-- TOC entry 1978 (class 2606 OID 65642)
-- Name: FK_address; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT "FK_address" FOREIGN KEY (address_id) REFERENCES address(id);


--
-- TOC entry 1982 (class 2606 OID 65704)
-- Name: FK_category; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY category
    ADD CONSTRAINT "FK_category" FOREIGN KEY (parent_id) REFERENCES category(id);


--
-- TOC entry 1980 (class 2606 OID 65660)
-- Name: FK_customer; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cart
    ADD CONSTRAINT "FK_customer" FOREIGN KEY (customer_id) REFERENCES customer(id);


--
-- TOC entry 1987 (class 2606 OID 65784)
-- Name: FK_employee; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT "FK_employee" FOREIGN KEY (employee_id) REFERENCES employee(id);


--
-- TOC entry 1988 (class 2606 OID 65789)
-- Name: FK_friend; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT "FK_friend" FOREIGN KEY (friend_employee_id) REFERENCES employee(id);


--
-- TOC entry 1984 (class 2606 OID 65725)
-- Name: FK_group; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY persons_groups
    ADD CONSTRAINT "FK_group" FOREIGN KEY (group_id) REFERENCES groupapp(id);


--
-- TOC entry 1983 (class 2606 OID 65720)
-- Name: FK_person; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY persons_groups
    ADD CONSTRAINT "FK_person" FOREIGN KEY (person_id) REFERENCES person(id);


--
-- TOC entry 1986 (class 2606 OID 65764)
-- Name: FK_relacion_course; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teachers_courses
    ADD CONSTRAINT "FK_relacion_course" FOREIGN KEY (course_id) REFERENCES course(id);


--
-- TOC entry 1981 (class 2606 OID 65689)
-- Name: FK_student; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student
    ADD CONSTRAINT "FK_student" FOREIGN KEY (mentor_id) REFERENCES student(id);


--
-- TOC entry 1985 (class 2606 OID 65759)
-- Name: FK_teacher; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teachers_courses
    ADD CONSTRAINT "FK_teacher" FOREIGN KEY (teacher_id) REFERENCES teacher(id);


--
-- TOC entry 1979 (class 2606 OID 65626)
-- Name: FK_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT "FK_user" FOREIGN KEY (user_id) REFERENCES userapp(id);


--
-- TOC entry 2102 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-07-28 11:13:29

--
-- PostgreSQL database dump complete
--

