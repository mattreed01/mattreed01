/*Name: Matthew Reed
 *Student Number: 19100133
 *Position: 88*/

class MatrixRow extends React.Component
{
    render()
    {
        let inputArray = [];
        let inputLength = this.props.cols;
        
        for (let i = 0; i < inputLength; i++)
        {
            inputArray.push((<input type="text" name="input" className="col" />));
        }
        
        return(<div className="row">{inputArray}</div>);
    }
};

class Matrix extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state = {numRows: this.props.rows, numCols: this.props.cols};
        this.getHeight = this.getHeight.bind(this);
        this.getWidth = this.getWidth.bind(this);
    }
    
    static defaultProps = {
        rows: 2,
        cols: 2
    };
    
    getHeight(height)
    {
       this.setState({numRows: height}); 
    }
    
    getWidth(width)
    {
        this.setState({numCols: width});
    }
    
    render()
    {
        let inputMatrix = [];
        let inputMatrixLength = this.state.numRows;
        
        for (let i = 0; i < inputMatrixLength; i++)
        {
            inputMatrix.push((<MatrixRow cols={this.state.numCols} />));
        }
        
        return (<div className="col-12 form-group">
            <MatrixSizeForm onMatrixHeight={this.getHeight} onMatrixWidth={this.getWidth} />
            <br />
            <br />
            {inputMatrix}
        </div>);
    }
};

class MatrixSizeForm extends React.Component
{
    constructor(props)
    {
        super(props);
        this.heightInput = React.createRef();
        this.widthInput = React.createRef();
        this.setHeightProp = this.setHeightProp.bind(this);
        this.setWidthProp = this.setWidthProp.bind(this);
    }
    
    setHeightProp()
    {
        let height = this.heightInput.current.value;
        this.props.onMatrixHeight(height);
    }
    
    setWidthProp()
    {
        let width = this.widthInput.current.value;
        this.props.onMatrixWidth(width);
    }
    
    render()
    {   
        return (<div className="col-12 form-group">
            <div className="row">
                <label htmlFor="height">Height</label> 
                <br />
                <input type="range" ref={this.heightInput} onChange={this.setHeightProp} defaultValue="2" max="10" name="h" id="height" className="form-control-range" />
            </div>
            
            <div className="row">
                <label htmlFor="width">Width</label> 
                <br />
                <input type="range" ref={this.widthInput} onChange={this.setWidthProp} defaultValue="2" max="6" name="w" id="width" className="form-control-range" />
            </div>
        </div>);
    }
};

ReactDOM.render(
    <Matrix />, 
    document.getElementById("react-container")
);