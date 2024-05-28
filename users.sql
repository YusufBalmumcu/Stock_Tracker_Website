CREATE TABLE `users` 
    (`User_ID` INT NOT NULL AUTO_INCREMENT ,
    `User_Name` VARCHAR(255) NOT NULL ,
    `E_Mail` VARCHAR(255) NOT NULL ,
    `First_Name` VARCHAR(255) NOT NULL ,
    `Last_Name` VARCHAR(255) NOT NULL ,
    `GSM_No` VARCHAR(255) NOT NULL ,
    `Birth_Date` DATE NOT NULL ,
    `Password` VARCHAR(255) NOT NULL ,
    `Favourites` VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`User_ID`)
)AUTO_INCREMENT=0;
