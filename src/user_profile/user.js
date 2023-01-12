const user = document.querySelector('.info');

const obj  = {
  name: "Lawrence",
  status: [
    'One',
    'Two',
    'Three',
    'Four'
  ],
  [Symbol.iterator]() {
    let index = 0;
    return{
      next: () => {
        if(index < this.status.length){
          const result = {value: this.status[index], done: false};
          index++;

          return result;
        }else{
          return {value: undefined, done: true};
        }
      }
    }
  }
}

for (const value of obj) {
  user.innerHTML = value;
  console.log(value)
}