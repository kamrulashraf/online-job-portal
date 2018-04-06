create table EMPLOYEE(
   employee_id varchar2(200) not null,
   user_name varchar2(20) not null,
   password varchar2(100),
   first_name varchar2(200),
   middle_name varchar2(200),
   last_name varchar2(200),
   designation varchar2(20),
   department_name varchar2(20),
   join_date date,
  
CONSTRAINT EMPLOYEE_employee_id_pk PRIMARY KEY (employee_id)   

)

create table Salary (
 employee_id varchar2(200) PRIMARY KEY  not null
    REFERENCES employee(employee_id)
    ON DELETE CASCADE,
basic_pay varchar2(20) check (basic_pay>0),
additional_pay number,
payment_method varchar2(20),
gratuaty_ammount varchar2(20),
gratuaty_year varchar(20)

);

create table monthly_salary_status(
   employee_id varchar2(20) ,
   month varchar2(20) not null,
   year varchar(20),
   bonus number,
   payment_date date,
   payment_status varchar2(200) 
)
create table COMPANY(
    company_id varchar2(20) not null,
    company_name varchar2(20) not null,
    email_id varchar2(20) not null,
    company_alternate_name varchar2(20),
    password varchar2(200) not null,
    user_name varchar2(20) not null,
	alternate_company_name varchar2(200),
    
   
   CONSTRAINT COMPANY_company_id_pk PRIMARY KEY (company_id )  
)

create table advertisement(
    advertisement_id varchar2(20),
    advertisement_size varchar2(20),
    advertisement_cost number,
    start_time date not null,
    ending_time date not null,
    advertisement_status varchar2(200),
    advertisement_title varchar2(20),
    advertisement_type varchar2(200),
    constraint pk_service_id primary key (advertisement_id)
)

create table TRAINING(
  course_id varchar2(20) not null,
  course_type varchar2(20),
  company_name varchar2(20) not null,
  course_start_date date,
  course_end_date date,
  CONSTRAINT TRAINING_course_id_pk PRIMARY KEY (course_id)   
)

create table schedule(
    course_id varchar2(20) not null,
    class_location varchar2(20),
    class_start_time varchar2(20),
    class_end_time varchar2(20),
    class_date date,
  Constraint schedule_course_id_fk foreign key(course_id) references training(course_id) on delete cascade
)

CREATE TABLE COMPANYADDRESS(
Company_id varchar2(20) not null,
Country varchar2(20)  not null,
District varchar2(20) not null,
Street_address varchar2(20),
Postal_code number,


Constraint ca_ci_fk foreign key(company_id) references COMPANY(company_id)
on delete cascade
)

CREATE TABLE employee_mobile_number(
    employee_id varchar2(200) not null,   
    mobile_number varchar2(200) not null,
Constraint emn_ei_fk  foreign key(employee_id) references EMPLOYEE(employee_id)
 on delete cascade
)

create table jobseeker(

jobseeker_id varchar2(200) not null,
username varchar2(200) not null unique ,
password varchar2(200) not null,
email_id varchar2(200)  not null,
first_name varchar2(200),
middle_name varchar2(200),
last_name varchar2(200),
nationality varchar2(200),
marital_status varchar2(200),
gender varchar2(200),

    
CONSTRAINT jobseeker_jobseeker_id_pk PRIMARY KEY (jobseeker_id)   
);


create table forum(

topic varchar2(100),
published_time date,
post_id number not null,
author_id varchar(200) not null,
CONSTRAINT FORUM_author_id_pk PRIMARY KEY (author_id)    
);

create table jobagent(

    agent_id varchar2(20) not null,
    agent_name varchar2(20), 
    salary_upper_bound number,
    salary_lower_bound number,
    job_category varchar2(200),
    job_type varchar2(20),
    
    CONSTRAINT jobagent_agent_id_pk PRIMARY KEY (agent_id)
     CONSTRAINT jobseeker_id_FK FOREIGN KEY(jobseeker_id) REFERENCES jobseeker(jobseeker_id) on delete cascade
   
)


create table creating(
  jobseeker_id varchar2(200) not null,
  agent_id varchar2(200) not null,
 
CONSTRAINT creating_jobseeker_id_FK FOREIGN KEY(jobseeker_id) REFERENCES jobseeker(jobseeker_id) on delete cascade, 
CONSTRAINT creating_agent_id_FK FOREIGN KEY(agent_id) REFERENCES jobagent(agent_id) on delete cascade

)


