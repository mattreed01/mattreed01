/*Name: Matthew Reed
  Student No.: 19100133
  Position: 88*/

import React from "react";
import PropTypes from "prop-types";

export class MinimumMarkForm extends React.Component
{
    constructor(props)
    {
        super(props);
        this.minMarkNum = React.createRef();
        this.submit = this.submit.bind(this);
    }
    
    submit(event)
    {
        event.preventDefault();
        let minNum = this.minMarkNum.current.value;
        this.props.minimumScoreNumber(minNum);
    }
    
    render()
    {
        return (<div className="row">
            <input type="number" name="minimumMark" min="0" max="100"
                defaultValue="20" ref={this.minMarkNum} onChange={this.submit} className="col-12 form-control" />
        </div>);
    }
};

MinimumMarkForm.propTypes = {
    minimumScoreNumber: PropTypes.func.isRequired
};