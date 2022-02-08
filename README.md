Auth Module
Created ApiRegisterController located at Controller/Auth/ApiRegisterController with functions:
login() to handle login request and authentication, 
register function to handle user's registration,
createUser() to insert user to database table, 
createWalletId() returns random numbers as wallet_code
createNewToken() generates taken, 
userProfile() displays users information



WalletController Module
its located at Controller Directory the class name is WalletController
inside WalletController, we have the following functions
walletToWallet() this functions recieves amount and destination wallet, debits the source wallet and credits the destination 
debit() debits the source wallet 

also implemented the factory pattern code as shown in the flowchart
