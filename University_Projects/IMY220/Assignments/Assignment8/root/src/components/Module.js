/*Name: Matthew Reed
  Student No.: 19100133
  Position: 88*/

import React from "react";
import PropTypes from "prop-types";

export class Module extends React.Component
{
    render()
    {
        return (
            <div className="col-4">
                <div className="card">
                    <div className="card-header">
                        <h5 className="card-title">{`${this.props.module.code}`}</h5>
                    </div>
                    <div className="card-body">
                        <div className="card-text">
                            <b>Description:</b> {`${this.props.module.department}`}
                            <br />
                            <b>Mark:</b> {`${this.props.module.mark}`}
                        </div>
                    </div>
                </div>
            </div>
        );
    }
};

Module.propTypes = {
    module: PropTypes.object.isRequired
};