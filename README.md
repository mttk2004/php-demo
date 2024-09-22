### HOW TO FIX ERROR 'DRIVER COULD NOT FIND' WHEN USE NEW PHP VERSION

#### 1. Create a new file and name it `php.ini` (copy the content of `php.ini-development` or `php.ini-production`)

#### 2. Uncomment the line `extension=pdo_mysql` (remove the `;` at the beginning of the line)

#### 3. Add the line `extension=php_pdo_mysql.dll` (optional)

#### 4. Edit the path of `extension_dir` to the absolute path of the `ext` folder in your PHP installation directory

#### 5. Save the file and restart the server

#### 6. Use `phpinfo()` to check if the `pdo_mysql` extension is loaded

#### 7. Done!

---

### CREDITS

- [Mai Tran Tuan Kiet] [**@mttk2004**](https://github.com/mttk2004)

---
