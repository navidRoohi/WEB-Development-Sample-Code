// NAVID ROOHI BROOJENI



import java.util.Scanner;
import java.text.DecimalFormat;

public class Membership{
   public static void main(String[] args){
   
   int input;
   double total = 0;
   
   Scanner keyboard = new Scanner(System.in);
   DecimalFormat formatter = new DecimalFormat("#0.00");
   
   
   
   getInfo();
   
   input = keyboard.nextInt();

   while ( input != 3){
      if (input == 1){
       total += 50.50;
        System.out.println("You sold a six month membership.");
        getInfo();
   
   input = keyboard.nextInt();
       }
       else if (input ==2){
        total += 99.00;
        System.out.println("You sold a 12 month membership.");
        getInfo();
   
   input = keyboard.nextInt();

        }
        else{
         System.out.println("You have made an invalid selection.");
         getInfo();
         input = keyboard.nextInt(); 
         }
  
   }System.out.println("The total book club membership sales were $"+formatter.format(total));
   
   }
   
   public class String checkList(){
   
    String name= null;
    String lastName  null;
    int age = 0;
    int age2 =2;
    
    for (int i =0;i<arrayList.length;i++){
    
    while ( i !=4 ){
    
    int input = keyboard.nextInt();
    if (input <= 6){
    // here we need to find the calculation in this 
    }
    
    }
    }
    
   
   }
   
   public  static String getInfo(){
   System.out.println("\nBOOK CLUB MEMBERSHIP MENU");
         System.out.println("1) Sell a Six Month Membership");
         System.out.println("2) Sell a Twelve Month Membership");
         System.out.println("3) Quit the Program\n");
         System.out.println("Make a selection by choosing a number: ");
   
   }
}
