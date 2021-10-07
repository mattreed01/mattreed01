/*Name: Matthew Reed
 *Student Number: 19100133
 *Position: 88*/

import {EuclidianPoint} from './EuclidianPoint.js';

export class EuclidianPointList
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
}