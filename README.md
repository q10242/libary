# 關於Pre-test的答案

1. 程式碼已經提供。
2. PHP 當中的 interface 在於當需要替換實作底層程式碼，但是主要的流程不變的時候。可以透過Interface來分離相依性，並且所有實作Interface的介面都必須要實現所有Interface中規定的方法，因此調用Interface中的方法必定能保證該類別有實作這個方法的程式碼。 abstract則是在設計class 時許多子class會有的共通屬性和方法。可以由abstract來設定，重點在繼承的子class必須要實作所有abstract的方法抽象方法，否則它仍然還是abstract ，這樣一來就可以保證可以實體化的子class一定擁有abstract class的method

3. 假設有多項檢查，那麼就必須要有辦法實作這些檢查。這裡使用abstract class 實作一個流程，傳入需要檢查的物件(假設是User)，那就會需要結構如下
```
abstract class Checker {
    
    protected $nextCheck;
    public function then(Checker $check)
    {
        
        $this->nextCheck = $check;
    }
     public abstract function check(User $user);


     public function next(User $user)
     {
         if(!$this->nextCheck) return;
         $this->nextCheck->check($user);
     }

}
```


接著，繼承所有這個abstract class的子class 都必須要實作check，在check中實作測試，如果不通過則丟出exception，但如果通過就呼叫next() 來進行下一個測試。

這樣一來，就可以透過繼承不斷增加檢查的middleware了。