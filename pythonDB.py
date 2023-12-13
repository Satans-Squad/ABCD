import mysql.connector

# Replace 'your_username', 'your_password', and 'your_database' with your actual credentials
connection = mysql.connector.connect(
    host="localhost",        # Change to your MySQL server address
    user="your_username",    # Change to your MySQL username
    password="your_password",# Change to your MySQL password
    database="your_database" # Change to your MySQL database name
)

if connection.is_connected():
    print("Connected to MySQL server")
    # Perform database operations here

    # Don't forget to close the connection when you're done
    connection.close()
    print("Connection closed")
else:
    print("Failed to connect to MySQL server")
