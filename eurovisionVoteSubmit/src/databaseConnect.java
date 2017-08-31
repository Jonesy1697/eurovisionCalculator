
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.JComboBox;

/**
 * 
 * @author Christopher
 */
public class databaseConnect {

    String host;
    String uName;
    String uPass;
    Connection con;
    Statement stmt;
    ResultSet rs;

    /**
     * This class will handle all the database SQL queries between the database
     * and the system, holding how to connect onto the database
     * 
     * @throws SQLException will identify an SQL error if/when one occurs
     */
    public databaseConnect() throws SQLException {
            
        host = "jdbc:mysql://localhost/eurovisioncalc";
        uName = "root";
        uPass = "";
        
        con = DriverManager.getConnection(host, uName, uPass);
    }
    
    public boolean checkUser(String ID, String password) throws SQLException{
       
        ID = "\"" + ID + "\"";
        
        stmt = con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
        String SQL = "SELECT password FROM people where name = " + ID;
        rs = stmt.executeQuery(SQL);
                        
        rs.first();        
        return password.equals(rs.getString("password"));
        
    }

   public boolean validateUser(String ID) throws SQLException{
        
        ID = "\"" + ID + "\"";
        
        stmt = con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
        String SQL = "SELECT * FROM people where name = " + ID;
        rs = stmt.executeQuery(SQL);
        
        int count = 0;
        
        while (rs.next()){
            
            count +=1;
            
        }
        
        if (count == 0){
            return true;
        }
        else{
            return false;
        }
    }
   
    /**
     * Closes the current connection to the database
     * 
     * @throws SQLException will identify an SQL error if/when one occurs
     */
    public void closeConnection() throws SQLException {

        stmt.close();
        rs.close();

    }

    public void getUsers() throws SQLException {

        stmt = con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
        String SQL = "SELECT * FROM people";
        rs = stmt.executeQuery(SQL);

    }
    
     public ResultSet getRS() {

        return rs;

    }
    
}
