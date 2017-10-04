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

INSERT INTO usuarios(nome, usuario, email, senha, adm) VALUES ('Gabriel Martins Silva', 'modNOBUGS', 'comunicacao@nobugs.com.br','$2y$10$mcE7IrqmXALPXM2XvBvTp.jxK7c3tuvplWAOf/Pd85e6JE0I58VbG','1');
//usuario padrão inicial: modNOBUGS senha: nobugs123
