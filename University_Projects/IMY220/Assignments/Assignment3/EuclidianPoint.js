/*Name: Matthew Reed
 *Student Number: 19100133
 *Position: 88*/

export class EuclidianPoint
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
            console.log(`${error}`);
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
            console.log(`${error}`);
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