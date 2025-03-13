import sys
import json

def bitwise_operations(numbers, threshold):
    if not numbers:
        return {"error": "No valid numbers provided"}

    # Convert to list of integers
    try:
        num_list = list(map(int, numbers.split(',')))
        threshold = int(threshold)
    except ValueError:
        return {"error": "Invalid input. Only integers are allowed."}

    if not num_list:
        return {"error": "List of numbers is empty"}

    # Bitwise operations
    bitwise_and = num_list[0]
    bitwise_or = num_list[0]
    bitwise_xor = num_list[0]

    for num in num_list[1:]:
        bitwise_and &= num
        bitwise_or |= num
        bitwise_xor ^= num

    # Filter numbers greater than threshold
    filtered_numbers = [num for num in num_list if num > threshold]

    # Return results as JSON
    return {
        "Bitwise AND": bitwise_and,
        "Bitwise OR": bitwise_or,
        "Bitwise XOR": bitwise_xor,
        "Numbers greater than threshold": filtered_numbers
    }

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print(json.dumps({"error": "Missing input arguments"}))
        sys.exit(1)

    numbers = sys.argv[1]
    threshold = sys.argv[2]

    result = bitwise_operations(numbers, threshold)
    print(json.dumps(result))  # Output results in JSON format
