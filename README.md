# mrdbid-p

mrdbid-p.com is a php mysql website providing a specimen management system for mushrooms. Keep in mind that each individual mushroom is a specimen. Aggregation and grouping can be done using individual data.

Important to note is that there may not be a "range" of measurements in some characters, since the specimen's cap width, for example, is whatever it is measured as at the time. Some change, such as colors once the specimen is cut or test chemicals applied may occur, but those are characters on their own.

The original idea is to be able to compare specimens in the database to find comparable specimens.

Right now (4-9-2024) the MBList database is the source for genus/species data, but only a tiny subset is used for simplicity in development. Full use of this database will occur in the end product, hopefully.

The main project, mrdbid.com will be done using Laravel. This will free me from the security headaches that require more time, attention and know how than I possess. 

So, while this is working code, hopefully, it has not (and will not ) been rigorously tested.

At a minimum, I hope it saves someone some time with data input.
