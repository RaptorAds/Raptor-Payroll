CREATE TABLE User (
`ID` int UNIQUE,
`Username` varchar(255) NOT NULL UNIQUE,
`Email` varchar(255) NOT NULL UNIQUE,
`Password` varchar(255) NOT NULL,
`CompanyList` varchar(255) NULL
);
CREATE UNIQUE INDEX UserIndex
ON User (ID);
