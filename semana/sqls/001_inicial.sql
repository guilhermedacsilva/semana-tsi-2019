CREATE DATABASE semana COLLATE 'utf8_unicode_ci';

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT ,
    nome VARCHAR(255) NOT NULL ,
    ra VARCHAR(255) NOT NULL ,
    senha VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE frases (
    id INT NOT NULL AUTO_INCREMENT ,
    nome VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE usuarios_frases (
    usuario_id INT NOT NULL ,
    frase_id INT NOT NULL ,
    PRIMARY KEY (usuario_id, frase_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
    FOREIGN KEY (frase_id) REFERENCES frases (id)
)
ENGINE = InnoDB;
