CREATE DATABASE semana COLLATE 'utf8_unicode_ci';

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT ,
    ra VARCHAR(255) UNIQUE NOT NULL ,
    nome VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE codigos (
    id INT NOT NULL AUTO_INCREMENT ,
    nome VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE usuarios_codigos (
    usuario_id INT NOT NULL ,
    codigo_id INT NOT NULL ,
    pontos INT NOT NULL ,
    PRIMARY KEY (usuario_id, codigo_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
    FOREIGN KEY (codigo_id) REFERENCES codigos (id)
)
ENGINE = InnoDB;
