import React from 'react';
import 'bootstrap/dist/css/bootstrap.css';
import '../styles/User.css'

const UserList = (props) => {
    return (
        <>
            {props.users.map((user, index) => (
                <div className='card usercard' key={user.id}>
                    <img className="card-img-top rounded-circle userimg" src={user.image} alt="User pp"></img>
                    <div className="card-body">
                        <h4 className="card-title">{user.firstName} {user.lastName}</h4>
                        <p className="card-text">{user.maidenName}</p>
                        <div className='userGrayText'>
                            <p className="card-text">@{user.username}</p>
                            <p className="card-text">{user.email}</p>
                            <hr></hr>
                            <p className="card-text">{user.birthDate}</p>
                            <p className="card-text">{user.gender}</p>
                            <p className="card-text">{user.height}cm / {user.weight}kg</p>
                            <hr></hr>
                            <p className="card-text">{user.address.address} {user.address.city}</p>
                            <p className="card-text">{user.address.address}, {user.address.postalCode}</p>
                        </div>
                    </div>
                </div>
            ))}
        </>
    );
};

export default UserList;