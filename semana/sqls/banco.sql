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
    data_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (usuario_id, codigo_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
    FOREIGN KEY (codigo_id) REFERENCES codigos (id)
)
ENGINE = InnoDB;

INSERT INTO codigos (nome) VALUES ('Seu futuro depende de muita coisa, mas principalmente de você');
INSERT INTO codigos (nome) VALUES ('Algumas pessoas sonham com o sucesso, enquanto outras acordam e trabalham duro para isso');
INSERT INTO codigos (nome) VALUES ('Enquanto você arranja desculpas outro encontra soluções');
INSERT INTO codigos (nome) VALUES ('Diante de uma dificuldade, substitua o não consigo por vou tentar outra vez.');
INSERT INTO codigos (nome) VALUES ('Tudo o que um sonho precisa para ser realizado é que alguém acredite que ele possa ser realizado');
INSERT INTO codigos (nome) VALUES ('Inteligência é a capacidade de absorver informação em tempo real. De fazer perguntas que façam sentido. É ter boa memória. É traçar pontes entre assuntos que não parecem estar relacionados. É inovar ao fazer essas conexões.');
INSERT INTO codigos (nome) VALUES ('O Palmeiras tem Mundial (1951)');
