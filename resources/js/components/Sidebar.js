import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Sidebar extends Component {
    render() {
        return (

           
<div className="fixed-sidebar">
    <div className="fixed-sidebar-left sidebar--small" id="sidebar-left">


        <div className="mCustomScrollbar" data-mcs-theme="dark">
            <ul className="left-menu">
                <li>
                    <a href="#" className="js-sidebar-open">
                        <svg className="olymp-menu-icon left-menu-icon"  
                        data-toggle="tooltip" data-placement="right"   
                        data-original-title="OPEN MENU">
                            Users
                        </svg>
                    </a>
                </li>
                 
            </ul>
        </div>
    </div>
 
</div>


        );
    }
}

if (document.getElementById('side_nav')) {
    ReactDOM.render(<Sidebar />, document.getElementById('side_nav'));
}
