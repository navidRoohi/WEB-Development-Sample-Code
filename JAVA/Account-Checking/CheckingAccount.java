
package assignment.pkg1;

/**
 *
 * @author navid roohi broojeni
 */



public class CheckingAccount {
    private double totalServiceCharge;
    private double balance;
    private double currentServiceCharge;
    private int num=0;
    String message;
    

   
    
  public CheckingAccount(double b){
      balance = balance + b;
      totalServiceCharge = 0;
  }
  
  public void setBalance(int tranC, double transAmo){
      if (tranC==1){
          balance = balance - transAmo;
      }else {
          balance = balance + transAmo;
      }
  }
    public double getBalance(){
      return balance;
      
  }
  
  public void setTotalServiceCharge(double currentServiceCharge){
      
      double addServiceCharge=0;
      message = "";
       
      
      if (num<1 && balance < 500 ){
          message += "\nMessage: Your Balance is Below 500$ \nService charge below 500---Charge 5$ \n";
          addServiceCharge +=5;
          // should happens just one time, so :
          num++;
      } 
      if (balance < 50){
          message += "\nMessage: Your Balance is Below 50$ \n";
      } 
      if (balance < 0){
          message += "\nWARNING! Your Balance is Negative \nService charge: below 0---Charge 10$ \n";
          addServiceCharge +=10;
      }
      
     totalServiceCharge = totalServiceCharge + currentServiceCharge + addServiceCharge; 
                 
  }

  
  public double getTotalServiceCharge(){
      return totalServiceCharge;
  
 }
  
  public double finalBalance(){
      return getBalance()-totalServiceCharge;
  }

}
