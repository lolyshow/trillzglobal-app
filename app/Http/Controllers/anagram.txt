/* Two strings are anagrams if they are permutations of each other.
In other words, both strings have the same size and
the same characters.
For example, "aaagmnrs" is an anagram of "anagrams".
Given an array of strings, remove each string
that is an anagram of an earlier string,
then return the remaining array in sorted order.
*/
// Input e.g. [ "FOO", "foo", "oFo", "abc", "cba"]
// Expected output ["abc", "FOO"]
  
 const filterAnagrams = (inp) => {
  // TYPE YOUR CODE HERE
  let len = inp.length;
//   console.log(len);
  let arr1 = [];
  for(let i = 0; i<len;i++){
    // console.log(inp[i]);
    let res = stringPermutations(inp[i]);
    let inc = 0;
    arr1.forEach(val => {

        res.forEach(element => {
            if(val.toUpperCase() === element.toUpperCase()){
                inc = 1;
                
            }
            
        });
    });
    if(inc == 0){
        arr1.push(inp[i]);
    }
    
    
    
  }
  
  console.log(arr1);
  
};

const stringPermutations = str => {
    // console.log("strr"+str);
  if (str.length <= 2) return str.length === 2 ? [str, str[1] + str[0]] : [str];
  return str
    .split('')
    .reduce(
      (acc, letter, i) =>
        acc.concat(stringPermutations(str.slice(0, i) + str.slice(i + 1)).map(val => letter + val)),
      []
    );
};


module.exports = {
    filterAnagrams
    
};



filterAnagrams(["foo", "ofo", "bar", "baz", "arb"]);

