CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    role ENUM('ADMIN', 'AUTHOR', 'READER') NOT NULL
);


CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tetel VARCHAR(100) NOT NULL ,
    idAuthor INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (idAuthor) REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL
);

CREATE TABLE category_article (
    idCategory INT NOT NULL,
    idArticle INT NOT NULL,
    PRIMARY KEY (idCategory, idArticle),
    FOREIGN KEY (idCategory) REFERENCES categories(id)
        ON DELETE CASCADE,
    FOREIGN KEY (idArticle) REFERENCES articles(id)
        ON DELETE CASCADE
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idReader INT NOT NULL,
    idArticle INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (idReader) REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (idArticle) REFERENCES articles(id)
        ON DELETE CASCADE
);


CREATE TABLE article_likes (
    idReader INT NOT NULL,
    idArticle INT NOT NULL,
    PRIMARY KEY (idReader, idArticle),
    FOREIGN KEY (idReader) REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (idArticle) REFERENCES articles(id)
        ON DELETE CASCADE
);


CREATE TABLE comment_likes (
    idReader INT NOT NULL,
    idComment INT NOT NULL,
    PRIMARY KEY (idReader, idComment),
    FOREIGN KEY (idReader) REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (idComment) REFERENCES comments(id)
        ON DELETE CASCADE
);


CREATE TABLE dommendchengesRole (
    idUser INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES users(id)
        ON DELETE CASCADE
);


CREATE TABLE rapores (
    idComment INT NOT NULL,
    idReader  INT NOT NULL
);



