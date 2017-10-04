CREATE TABLE upload(
  id int(11) AUTO_INCREMENT,
  nome varchar(50) not NULL,
  autor varchar(50) not NULL,
  pchave varchar(50) not NULL,
  area varchar(50) not NULL,
  resumo varchar(240),
  path varchar(80) not NULL
);

CREATE TABLE usuarios(
  nome varchar(256) not NULL,
  usuario varchar(256) not NULL,
  email varchar(256) not NULL,
  senha varchar(256) not NULL,
  adm BOOLEAN 
);
