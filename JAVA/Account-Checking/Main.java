
package assignment.pkg1;

import javax.swing.JOptionPane;
import java.util.Date;
import java.text.DecimalFormat;

/**
 *
 * @author navidroohibroojeni
 */

public class Main {

    // Global variables
    static String transaction;
    static double initBalance;
    static int transactionCode;
    static double currentServiceCharge;
   
    
    public static void main(String[] args) {
        // TODO code application logic here
        double amount=0;
        
      
        initBalance = getInitialBalance();
        CheckingAccount checkingAccountObj =  new CheckingAccount(initBalance);
        DecimalFormat form = new DecimalFormat("$##,##0.00;($##,##0.00)");

        transactionCode = getTransCode();
        
        if (transactionCode !=0 ){
          do{
              if (transactionCode==1 ){
                  amount = checkAmount();
                  transaction="Check";
                  currentServiceCharge=0.15;
                          
              }else {
                  amount = depositAmount();
                  transaction = "Deposit";
                  currentServiceCharge=0.10;
              }  
              
              checkingAccountObj.setBalance(transactionCode, amount);
              checkingAccountObj.setTotalServiceCharge(currentServiceCharge);
              
               JOptionPane.showMessageDialog(null, "Transaction: " + transaction + " amount of "+ form.format(amount) + "\n"
                   + "Current Balance: " + form.format(checkingAccountObj.getBalance()) +"\n"
                   + "Service charge: "+ transaction +" Charge--- "+ form.format(currentServiceCharge) + "\n" + checkingAccountObj.message
                   + "\nTotal Service Charge: " + form.format(checkingAccountObj.getTotalServiceCharge())+ "\n"
                   + "\n Date: "+ showDate());
           
              transactionCode = getTransCode();

            }while (transactionCode != 0);
        }
        transaction = "End";
        JOptionPane.showMessageDialog(null, " Transaction: " + transaction 
          + "\n Current Balance: " + form.format(checkingAccountObj.getBalance()) 
          + "\n Total Service Charge: " + form.format(checkingAccountObj.getTotalServiceCharge())
          + "\n Final Balance: " + form.format(checkingAccountObj.finalBalance())
          + "\n\n Date: "+ showDate());
        
        System.exit(0);
  
    }

    public static double getInitialBalance(){
        String initB = JOptionPane.showInputDialog("Enter The Initial Balance: ");
        initBalance = Double.parseDouble(initB);
        return initBalance;
    }
    
    public static int getTransCode(){
        String tranC = JOptionPane.showInputDialog("Enter The Transaction Code " 
                + "\n 1 for Check \n 2 for deposit \n 0 for exit");
        transactionCode = Integer.parseInt(tranC);
        
        return transactionCode;
    }
    
    public static double depositAmount(){
        String depA = JOptionPane.showInputDialog("Enter deposit amount: ");
        double depositAm = Double.parseDouble(depA);
        return depositAm;
    }
    
    public static double checkAmount(){
        String depA = JOptionPane.showInputDialog("Enter check amount: ");
        double checkAm = Double.parseDouble(depA);
        return checkAm;
    }
    
    
    
    public static String showDate(){
        Date date = new Date();
        return date.toString();
    }

}
