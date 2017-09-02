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
This isn't similar to fopen(). This just creates the HyFile. Even the file doesn't exists it does not return an error. 

_So, you can use $file variable (use any name you need) to work with your file._

### Read it

**Important! You do not need to open or close (with fopen and fclose) files when using HyFile. It will be done automatically**  

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
#### How to write into it?
There 2 parameters in write method. 
* 1st is the string you need to write  in. 
* 2nd is the mode you need to open the file("w" is the default). Visit [here](http://php.net/manual/en/function.fopen.php) to learn more) to learn more.
```
$file -> write($string); // Only the new string will be in the file.
$file -> write($string, "a") // The data in the file will be saved. :)
```

#### Does it exists? 
```
$file -> exists();
```
* Returns true if the file exists. false it not

#### Filesize
```
$file -> size();
```
* Returns the size in bytes.

#### Information
```
$info = $file -> info();
```
* Returns an object with file informaions.
* Directory name    $info -> dir;
* Basename          $info -> base;
* Extension         $info -> ext;
* Filename          $info -> name; **No Extension, No Path**

#### CopyTo
```
$file -> copyTo($destination);
```
* This will copy your file to the destination.
* If $destination is a directory, it will be copied to that Directoy with the same name of the file
  ```
  $file -> copyTo("includes") //Do not use '/' mark after the folder name
  ```
* If $destination is a filename, it will be copied with the name you give there.
  ```
  $file -> copyTo("includes/file.php") //Will be copied as file.php
  ```
  


By **Supun** @ [Hyvor](www.hyvor.com)
