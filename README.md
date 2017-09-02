# HyFile
Effective way to access files with php

## How to use 

### Construct HyFile
2 Parameters. 
1st is the filename with it's path.
2nd is whether you want to use Document Root in front of the filename
```
$file = new HyFile($filename, true);
```
This isn't similar to fopen(). This just creates the HyFile. Even the file doesn't exists it does not return an error. So, you can use $file variable (use any name you need) to work with your file.

### Read it

#### Read the whole file
```
$file -> read();
```
It will return the whole file as a string.
#### Limit the reading
Set the first parameter according to number of bytes you need to read;
```
$file -> read($num_of_bytes);
```


Created By Supun - Designer at www.hyvor.com
