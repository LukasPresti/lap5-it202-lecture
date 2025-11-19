-- Lukas Presti, IT202-005, Internet Applications, Unit 8 Exercise, lap5@njit.edu
CREATE TABLE contacts (
   id         INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name       VARCHAR(60)  NOT NULL,
   email      VARCHAR(100) NOT NULL,
   message    TEXT         NOT NULL,
   created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);
