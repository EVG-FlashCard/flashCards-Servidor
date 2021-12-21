CREATE TABLE audio(
    idAudio smallint NOT NULL AUTO_INCREMENT,
    titulo varchar (55) NOT NULL,
    nombreAutor varchar(55) NOT NULL,
    CONSTRAINT PK_audio PRIMARY KEY (idAudio)
)