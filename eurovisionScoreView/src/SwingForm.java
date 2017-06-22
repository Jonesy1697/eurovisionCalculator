
import java.awt.EventQueue;
import javax.swing.JFrame;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.JTextField;
import javax.swing.JLabel;

public class SwingForm {

    private JFrame frame;
    JLabel lblNames[] = new JLabel[24];
    JTextField countryFields[] = new JTextField[24];
    JTextField pointsFields[] = new JTextField[24];

    String host;
    String uName;
    String uPass;
    Connection con;
    Statement stmt;
    ResultSet rs;

    /**
     * Launch the application.
     */
    public static void main(String[] args) {
        EventQueue.invokeLater(new Runnable() {
            public void run() {
                try {
                    SwingForm window = new SwingForm();
                    window.frame.setVisible(true);
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
    }

    /**
     * Create the application.
     */
    public SwingForm() throws SQLException {
        initialize();
    }

    /**
     * Initialize the contents of the frame.
     */
    private void initialize() throws SQLException {
        
        host = "jdbc:mysql://localhost/eurovisioncalc";
        uName = "root";
        uPass = "";

        try {
            con = DriverManager.getConnection(host, uName, uPass);
        } catch (SQLException err) {
            System.out.println(err.getMessage());
        }

        
        frame = new JFrame();
        frame.setBounds(100, 100, 430, 700);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.getContentPane().setLayout(null);

        for (int i = 1; i <= 24; i++) {
                        
            JLabel newJLabel = new JLabel(String.valueOf(i));
            newJLabel.setBounds(65, i * 26, 46, 14);
            frame.getContentPane().add(newJLabel);

            JTextField newCountryField = new JTextField();
            newCountryField.setBounds(100, i * 25, 125, 20);
            frame.getContentPane().add(newCountryField);
            newCountryField.setColumns(10);
            newCountryField.enable(false);

            countryFields[i - 1] = newCountryField;

            JTextField newPointsField = new JTextField();
            newPointsField.setBounds(230, i * 25, 50, 20);
            frame.getContentPane().add(newPointsField);
            newPointsField.setColumns(10);
            newPointsField.enable(false);

            pointsFields[i - 1] = newPointsField;
        }

        Statement stmt = con.createStatement();
        String SQL = "SELECT * FROM `country` WHERE `final` = 1 ORDER BY `points` DESC;";
        ResultSet rs = stmt.executeQuery(SQL);
        
        int count = 0;
        
        while (rs.next()){
            String country = rs.getString("country");
            int points = rs.getInt("points");
            
            countryFields[count].setText(country);
            pointsFields[count].setText(String.valueOf(points));
            
            count++;
            
        }

    }
}
