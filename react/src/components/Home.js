import React from 'react';
import CategoryList from './CategoryList';
import AddCategory from './AddCategory';

const Home = ()=>{
    return(<>
        <div className="container">
        <div className="row g-5 mt-4">
            <div className="col-6">
                <AddCategory/>
            </div>
            <div className="col-6">
                <CategoryList/>
            </div>
        </div>
        </div>
    </>);
};
export default Home;