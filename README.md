To use the site contained within this code repository: 

1. Install [Docker Desktop](https://www.docker.com/products/docker-desktop/)

2. Copy (or rename) <code>docker-wp-config.php</code> to <code>wp-config.php</code>

3. Create a directory called <code>db</code> and grant all read-write privileges to it

4. Get the most recent Bitnami WordPress Image; at the command prompt, type: 
    
    <code>docker pull bitnami/wordpress:latest</code>

5. Run the following command to allow Docker access to these files:

    <code>sudo chmod -R 777 &lt;foldername&gt;</code>

    where <code>&lt;foldername&gt;</code> is the directory created by checking out this repository

    **NOTE: You may have to run this command more than once, as Docker Desktop for Windows is extremely dumb and will reset permissions on files, notably after plugin install/updates.**

6. Start the stack by running: 

    <code>docker-compose up -d</code>

7. Navigate to your localhost (typically http://localhost/)
