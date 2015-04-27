import java.sql.*;

public class mainClass {

    public mainClass() {
        // TODO Auto-generated constructor stub
    }

    public static void main(String[] args) {
        Connection db = null;
        try {
            Class.forName("org.postgresql.Driver");
            db = DriverManager.getConnection("jdbc:postgresql://54.171.167.38:5432/postgres", "postgres", "admincolo");
            Statement st = db.createStatement();
            ResultSet rs = st.executeQuery("SELECT \"tablename\" FROM \"pg_tables\"?;");
            while (rs.next()) {
                System.out.println(rs.getString(1));
            }
            rs.close();
            st.close();
        } catch (ClassNotFoundException e) {
            System.out.println("erreur");
            try {
                if (db != null) {
                    db.close();
                }
            } catch (SQLException e1) {
                // TODO Auto-generated catch block
                e1.printStackTrace();
            }
            e.printStackTrace();
        } catch (SQLException e) {
            try {
                if (db != null) {
                    db.close();
                }
            } catch (SQLException e1) {
                // TODO Auto-generated catch block
                e1.printStackTrace();
            }
            e.printStackTrace();
        }
    }
}