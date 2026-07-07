// TypeScript Interface Example
interface User {
    readonly id: number; // cannot be assigned after initialization
    name: { first: string; last: string };
    email: string;
    age: number;
    isActive: boolean;
    lastLogin?: Date; // Optional property
}

// Object literal that adheres to the User interface
const newUser: User = {
    id: 1,
    name: { first: "Brian", last: "Wardwell" },
    email: "bwardwell@brianwardwell.com",
    age: 30,
    isActive: true,
    lastLogin: new Date()
};

// Interface function to display user information
function displayUserInfo(user: User): void {
    console.log(`User Info:
    ID: ${user.id}
    Name: ${user.name.first} ${user.name.last}
    Email: ${user.email}
    Age: ${user.age}
    Active: ${user.isActive ? "Yes" : "No"}
    Last Login: ${user.lastLogin ? user.lastLogin.toISOString() : "Never"}`);
}

displayUserInfo(newUser);

// Class implementation of the User interface
// When implementing as a class, all properties defined in the interface must be present in the class.
class UserAccount implements User {
    readonly id: number;
    name: { first: string; last: string };
    email: string;
    age: number;
    isActive: boolean;
    lastLogin?: Date;

    constructor(id: number, name: { first: string; last: string }, email: string, age: number, isActive: boolean, lastLogin?: Date) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.age = age;
        this.isActive = isActive;
        this.lastLogin = lastLogin;
    }

    // Method example to update the user's last login date
    updateLastLogin(): void {
        this.lastLogin = new Date();
    }
}       