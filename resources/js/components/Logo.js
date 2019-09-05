import React, { Component } from 'react';
 

export const Logo = (props) => 
   <a href="" className="logo">
            <div className="img-wrap">
                <img src={props.path} alt="Eureka" />
            </div>
            <div className="title-block">
                <h6 className="logo-title"></h6>
            </div>
    </a>

export const MenuItem = (props) =>   
                <li>
                    <a href={props.url} className="js-sidebar-open">
                        <i className={props.icon} title={props.title}></i>
                    </a>
                </li>

 