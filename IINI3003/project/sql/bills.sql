CREATE TABLE bills (
    billID INT NOT NULL AUTO_INCREMENT,
    startDate DATE NOT NULL,
    destination VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    cost DECIMAL(13, 2) NOT NULL,
    isPaid BOOLEAN,
    userID INT,
    PRIMARY KEY (billID),
    FOREIGN KEY (userID) REFERENCES users(userID)
);
