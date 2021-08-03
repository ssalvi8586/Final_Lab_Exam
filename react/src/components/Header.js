import React from 'react'

const Header = props=>{
    return(
        <div>
            <button className={props.color} >{props.name}</button>
        </div>
    );
}
export default Header; 