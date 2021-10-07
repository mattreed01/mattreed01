/*Name: Matthew Reed
 *Student Number: 19100133
 *Position: 88*/

/*class EuclidianPoint
{
    constructor(arr)
    {
        try
        {
            if (arr === undefined)
            {
                throw "No parameters specified";
            } 
            else
            {
                this.coordArr = [];

                arr.some((el) => {
                    if (isNaN(el))
                    {
                        throw `${el} is not a number`;
                    } 
                    else
                    {
                        this.coordArr.push(el);
                    }
                });
            }
        } 
        catch (error)
        {
            return `${error}`;
        }
    };
    
    set coordinates(arr)
    {
        try
        {
            if (arr === undefined)
            {
                throw "No parameters specified";
            } 
            else
            {
                this.coordArr = [];

                arr.some((el) => {
                    if (isNaN(el))
                    {
                        throw `${el} is not a number`;
                    } 
                    else
                    {
                        this.coordArr.push(el);
                    }
                });
            }
        } 
        catch (error)
        {
            return `${error}`;
        }
    };
    
    calculateDistance(arr)
    {
        try
        {
            if (arr === undefined)
            {
                throw "No Parameters Specified";
            }
            else if(Array.isArray(arr))
            {
                var i = -1;

                const result = this.coordArr.reduce((acc, el) => {
                    i++;
                    return acc + Math.pow((arr[i] - el), 2);
                }, 0);

                return (Math.sqrt(result));
            }
            else
            {
                //console.log(`${arr.coordArr[0]}`);
                
                var i = -1;

                const result = this.coordArr.reduce((acc, el) => {
                    i++;
                    return acc + Math.pow((arr.coordArr[i] - el), 2);
                }, 0);

                return (Math.sqrt(result));
            }
        }
        catch (error)
        {
            return `${error}`;
        }
    };
}

class EuclidianPointList
{
    constructor(arr)
    {
        try
        {
            if (arr === undefined)
            {
                throw "No parameters specified"; 
            }
            else
            {            
                if (arr.every((point) => {return arr[0].coordArr.length == point.coordArr.length}))
                {
                   this.listArray = [];
                   
                   arr.some((el) => {
                       this.listArray.push(el);
                   });
                }
                else
                {
                    throw "Arguments arrays are not the same length";
                }
            }
        } 
        catch (error)
        {
            console.log(`${error}`);
        }
    }
    
    get positivePoints()
    {
        if (this.listArray.length > 0)
        {
            this.positiveArray = [];
            
            this.listArray.some((point) => {
                if (point.coordArr.every((el) => {return el >= 0;}))
                {
                    this.positiveArray.push(point);
                }
            });
            
            return this.positiveArray;
        }
        else
        {
            return "No elements in array";
        }
    }
    
    get totalDistance()
    {
        var total = 0;
        
        for (var i = 0; i < this.listArray.length-1; i++)
        {
            total += this.listArray[i].calculateDistance(this.listArray[i+1]);
        }
        
        return total;
    }
}*/

import {EuclidianPoint} from './EuclidianPoint.js';
import {EuclidianPointList} from './EuclidianPointList.js';

const p1 = new EuclidianPoint([1, 1]);
const p2 = new EuclidianPoint([2, 2]);
const p3 = new EuclidianPoint([2, 3]);

/*console.log("P1-P2 Distance: " + p1.calculateDistance(p2));
console.log("P2-P3 Distance: " + p2.calculateDistance(p3));

p3.coordinates = [5, 10];
console.log("P3 Container: " + p3);
const p4 = new EuclidianPoint([-20, 3]);
const p5 = new EuclidianPoint([250, -13]);
console.log("P4 Container: " + p4);
console.log("P5 Container: " + p5);
console.log("P4-P5 Distance: " + p4.calculateDistance(p5));*/

const list = new EuclidianPointList([p1, p2, p3]);
/*console.log("List Container: " + list);
const positive = list.positivePoints;
console.log(positive);
const tot = list.totalDistance;
console.log(tot);*/
